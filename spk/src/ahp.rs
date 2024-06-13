use ndarray::{Array2, Axis};
use serde::{Deserialize, Serialize};

use crate::{common::Criteria, util};

pub fn handle_input_for_pw(input: &str) {
    let input: AhpPWInput =
        serde_json::from_str(input)
            .unwrap_or_else(|e| panic!("Cannot parse input.\nE: {e}"));
    let output = serde_json::to_string(&get_priority_weight(input)).unwrap();
    println!("{output}");
}

pub fn get_priority_weight(input: AhpPWInput) -> AhpPwOutput {
    let comparison_matrix = get_matrix(input);
    let col_sum = comparison_matrix.sum_axis(Axis(0));
    let normalized_matrix = comparison_matrix.clone() / col_sum;
    let row_sum = normalized_matrix.sum_axis(Axis(1));
    let eigen_vector = row_sum / normalized_matrix.shape()[0] as f64;
    AhpPwOutput {
        comparison_matrix: util::from_array2_to_vec_vec(comparison_matrix),
        normalized_matrix: util::from_array2_to_vec_vec(normalized_matrix),
        priority_weight: util::from_array1_to_vec(eigen_vector),
    }
}

fn get_matrix(input: AhpPWInput) -> Array2<f64> {
    let matrix = Array2::from_shape_fn((input.criteria.len(), input.criteria.len()), |(i, j)| {
        if i == j {
            1.0
        } else {
            input
                .criteria_comparison
                .iter()
                .find_map(|cmp| {
                    if cmp.left_id == input.criteria[i].id
                        && cmp.right_id == input.criteria[j].id
                    {
                        Some(cmp.left_value / cmp.right_value)
                    } else if cmp.left_id == input.criteria[j].id
                        && cmp.right_id == input.criteria[i].id
                    {
                        Some(cmp.right_value / cmp.left_value)
                    } else {
                        None
                    }
                })
                .unwrap_or_else(|| {
                    panic!(
                        "Can't find the comparision between criteria \"{}\" and \"{}\"",
                        input.criteria[i].name, input.criteria[j].name
                    )
                })
        }
    });
    matrix
}

#[derive(Debug, Serialize, Deserialize)]
pub struct AhpPWInput {
    #[serde(alias = "kriteria")]
    criteria: Vec<Criteria>,
    #[serde(alias = "perbandingan_kriteria")]
    criteria_comparison: Vec<Comparison>,
}

#[derive(Debug, Serialize, Deserialize)]
struct Comparison {
    left_id: u32,
    right_id: u32,
    left_value: f64,
    right_value: f64,
}

#[derive(Debug, Serialize, Deserialize)]
pub struct AhpPwOutput {
    comparison_matrix: Vec<Vec<f64>>,
    normalized_matrix: Vec<Vec<f64>>,
    priority_weight: Vec<f64>
}

#[cfg(test)]
mod tests {
    use crate::{ahp::get_matrix, common::ScoreType};
    use ndarray::Axis;

    use super::{get_priority_weight, AhpPWInput, Comparison, Criteria};

    #[test]
    fn get_priority_weight_test() {
        let input = get_test_input();
        let output = get_priority_weight(input);
        println!("{output:#?}");
    }

    #[allow(unused)]
    fn get_test_input() -> AhpPWInput {
        AhpPWInput {
            criteria: vec![
                Criteria {
                    id: 1,
                    name: String::from("Kriteria A"),
                    score_type: ScoreType::Fixed,
                    column_name: String::from("column_a")
                },
                Criteria {
                    id: 2,
                    name: String::from("Kriteria B"),
                    score_type: ScoreType::Fixed,
                    column_name: String::from("column_a")
                },
                Criteria {
                    id: 3,
                    name: String::from("Kriteria C"),
                    score_type: ScoreType::Fixed,
                    column_name: String::from("column_a")
                },
            ],
            criteria_comparison: vec![
                Comparison {
                    left_id: 1,
                    right_id: 2,
                    left_value: 1.0,
                    right_value: 3.0,
                },
                Comparison {
                    left_id: 1,
                    right_id: 3,
                    left_value: 1.0,
                    right_value: 2.0,
                },
                // Try Comment this
                Comparison {
                    left_id: 2,
                    right_id: 3,
                    left_value: 2.0,
                    right_value: 3.0,
                },
            ],
        }
    }

    #[test]
    fn test_input_to_matrix() {
        let input = get_test_input();
        let matrix = get_matrix(input);
        println!("\nMatrix: \n{:.4}\n", matrix);
        #[rustfmt::skip]
        assert_eq!(
            matrix.as_slice(),
            Some(&[
                1.   , 1./3., 1./2.,
                3./1., 1.   , 2./3.,
                2./1., 3./2., 1.
            ] as &[f64])
        );
    }

    #[test]
    fn test_col_sum() {
        let input = get_test_input();
        let matrix = get_matrix(input);
        let col_sum = matrix.sum_axis(Axis(0));
        println!("\nCol sum: \n{:.4}\n", col_sum);
        #[rustfmt::skip]
        assert_eq!(
            col_sum.as_slice(),
            Some(&[
                1.    + 3./1. + 2.,
                1./3. + 1.    + 3./2.,
                0.5   + 2./3. + 1.
            ] as &[f64])
        );
    }

    #[test]
    fn test_normalize_matrix() {
        let input = get_test_input();
        let matrix = get_matrix(input);
        let col_sum = matrix.sum_axis(Axis(0));
        let normalized_matrix = matrix / col_sum;
        println!("\nNormalized matrix: \n{:.4}\n", normalized_matrix);
    }
}

