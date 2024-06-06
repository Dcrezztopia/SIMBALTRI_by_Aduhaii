use std::env::args;
use serde::{Serialize, Deserialize};
use ndarray::prelude::*;

fn main() {
    // ELECTRE

    // the data would look like 
    // {
    //     "data": [
    //         [1, 2, 3],
    //         [2, 3, 1],
    //         [3, 1, 2],
    //     ],
    //     "weight": [1, 2, 3],
    //     "criteria_kind": ["benefit", "cost", "benefit"]
    // }

    let args = args().collect::<Vec<String>>();

    let raw_data = serde_json::from_str::<TheThing>(&args[1]).unwrap();
    // println!("{:?}", raw_data);

    // println!("{} / {}", raw_data.data.len(), raw_data.data[0].len());

    let mut data = Array2::<f64>::from_shape_vec((raw_data.data[0].len(), raw_data.data.len()), raw_data.data.concat()).unwrap();
    // println!("{}", data);

    //square root of the sum of the squares of the values
    let col_magnitude = data.map_axis(Axis(0), |col| {
        col.iter().map(|x| x.powf(2.)).sum::<f64>().sqrt()
    });
    // println!("{}", col_magnitude);

    // normalisasi
    for mut i in data.axis_iter_mut(Axis(0)) {
        i /= &col_magnitude;
    }
    // data /= &col_magnitude;
    raw_data.criteria_kind.iter().enumerate().for_each(|(i, kind)| {
        if let CriteriaKind::Cost = kind {
            data.column_mut(i).mapv_inplace(|x| 1. - x);
        }
    });
    let _matrix_normalisasi = serde_json::from_str::<Vec<Vec<f64>>>(&data.to_string()).unwrap();
    // println!("{}", data);

    // pembobotan
    let weight = Array1::<f64>::from_shape_vec(raw_data.data[0].len(), raw_data.weight).unwrap();
    // println!("{}", weight);
    for mut i in data.axis_iter_mut(Axis(1)) {
        i /= &weight;
    }
    let _weighted_matrix = serde_json::from_str::<Vec<Vec<f64>>>(&data.to_string()).unwrap();
    // println!("{}", data);

    let num_rows = data.nrows();
    let num_cols = data.ncols();

    let concordance_matrix = Array2::<f64>::from_shape_fn((num_cols, num_cols), |(i, j)| {
        if i == j {
            return 0.;
        }
        let mut sum = 0.;
        for k in 0..num_rows {
            if data[[k, i]] >= data[[k, j]] {
                sum += weight[k];
            }
        }
        sum 
    });
    let mut _concordance_matrix = vec![];
    for i in concordance_matrix.outer_iter() {
        let mut row = vec![];
        for j in i {
            row.push(*j);
        }
        _concordance_matrix.push(row);
    }
    // println!("{}", concordance_matrix);

    let discordance_matrix = Array2::<f64>::from_shape_fn((num_cols, num_cols), |(i, j)| {
        if i == j {
            0.
        } else {
            let i_min_j = &data
                .slice(s![.., i]) - &data.slice(s![.., j]);
            let numerator = i_min_j
                .iter()
                .filter(|x| x.is_sign_negative())
                .map(|x| x.abs())
                .max_by(|a, b| a.total_cmp(b))
                .unwrap_or(0.);
            let denominator = i_min_j
                .iter()
                .map(|x| x.abs())
                .max_by(|a, b| a.total_cmp(b))
                .unwrap();
            numerator / denominator
        }
    });
    let mut _discordance_matrix = vec![];
    for i in discordance_matrix.outer_iter() {
        let mut row = vec![];
        for j in i {
            row.push(*j);
        }
        _discordance_matrix.push(row);
    }
    // println!("{}", discordance_matrix);

    // let concordance_threshold = concordance_matrix.sum() / (num_rows * (num_rows - 1)) as f64;
    // let _concordance_threshold = concordance_matrix.sum() / (num_rows * (num_rows - 1)) as f64;
    // let discordance_threshold = discordance_matrix.sum() / (num_rows * (num_rows - 1)) as f64;
    // let _discordance_threshold = discordance_matrix.sum() / (num_rows * (num_rows - 1)) as f64;
    // println!("Concordance threshold: {}", concordance_threshold);
    // println!("Discordance threshold: {}", discordance_threshold);
    //
    // let concordance_matrix_dominance =
    //     concordance_matrix.mapv(|x| if x >= concordance_threshold { 1. } else { 0. });
    // let _concordance_matrix_dominance = serde_json::from_str::<Vec<Vec<f64>>>(
    //     &concordance_matrix_dominance.to_string(),
    // );
    // let discordance_matrix_dominance =
    //     discordance_matrix.mapv(|x| if x >= discordance_threshold { 1. } else { 0. });
    // let _discordance_matrix_dominance = serde_json::from_str::<Vec<Vec<f64>>>(
    //     &discordance_matrix_dominance.to_string(),
    // );
    // println!("{}", concordance_matrix_dominance);
    // println!("{}", discordance_matrix_dominance);
    //
    // let dominance_matrix = &concordance_matrix_dominance * &discordance_matrix_dominance;
    // let _dominance_matrix = serde_json::from_str::<Vec<Vec<f64>>>(
    //     &dominance_matrix.to_string(),
    // );
    // println!("{}", dominance_matrix);
    //
    // let penilaian_dominance = dominance_matrix.sum_axis(Axis(1));
    // println!("{}", penilaian_dominance);
    // let mut sorted_dominance = penilaian_dominance.iter().enumerate().collect::<Vec<(usize, &f64)>>();
    // sorted_dominance.sort_by(|a, b| a.1.partial_cmp(b.1).unwrap());
    // let perangkingan_dominance = Array1::<usize>::from_shape_fn(num_rows, |i| {
    //     for (rank, (idx, _)) in sorted_dominance.iter().enumerate() {
    //         if *idx == i {
    //             return rank;
    //         }
    //     }
    //     0
    // });
    // println!("{}", perangkingan_dominance);
    // println!("Concordance Matrix shape: {} x {}", concordance_matrix.nrows(), concordance_matrix.ncols());
    // println!("Discordance Matrix shape: {} x {}", discordance_matrix.nrows(), discordance_matrix.ncols());

    let concordance_min_discordance = concordance_matrix - discordance_matrix;
    let mut _concordance_min_discordance = vec![];
    for i in concordance_min_discordance.outer_iter() {
        let mut row = vec![];
        for j in i {
            row.push(*j);
        }
        _concordance_min_discordance.push(row);
    }
    // println!("{}", concordance_min_discordance);
    let nilai_akhir = concordance_min_discordance.sum_axis(Axis(1));
    let _nilai_akhir = nilai_akhir.to_vec();
    // println!("{}", nilai_akhir);
    
    let mut sorted_nilai_akhir = nilai_akhir.iter().enumerate().collect::<Vec<(usize, &f64)>>();
    sorted_nilai_akhir.sort_by(|a, b| a.1.partial_cmp(b.1).unwrap());
    sorted_nilai_akhir.reverse();
    let perangkingan_nilai_akhir = Array1::<usize>::from_shape_fn(num_cols, |i| {
        for (rank, (idx, _)) in sorted_nilai_akhir.iter().enumerate() {
            if *idx == i {
                return rank+1;
            }
        }
        0
    });
    // println!("{}", perangkingan_nilai_akhir);

    let response = Response {
        matrix_normalisasi: _matrix_normalisasi,
        weighted_matrix: _weighted_matrix,
        concordance_matrix: _concordance_matrix,
        discordance_matrix: _discordance_matrix,
        // concordance_threshold: _concordance_threshold,
        // discordance_threshold: _discordance_threshold,
        // concordance_matrix_dominance: _concordance_matrix_dominance,
        // discordance_matrix_dominance: _discordance_matrix_dominance,
        // dominance_matrix: _dominance_matrix,
        // penilaian_dominance,
        // perangkingan_dominance: perangkingan_dominance.to_vec(),
        concordance_min_discordance: _concordance_min_discordance,
        nilai_akhir: _nilai_akhir,
        ranking: perangkingan_nilai_akhir.to_vec()
    };
    println!("{}", serde_json::to_string(&response).unwrap());
}

#[derive(Debug, Serialize, Deserialize)]
struct TheThing {
    data: Vec<Vec<f64>>,
    weight: Vec<f64>,
    criteria_kind: Vec<CriteriaKind>
}

#[derive(Debug, Serialize, Deserialize)]
struct Response {
    matrix_normalisasi: Vec<Vec<f64>>,
    weighted_matrix: Vec<Vec<f64>>,
    concordance_matrix: Vec<Vec<f64>>,
    discordance_matrix: Vec<Vec<f64>>,
    // concordance_threshold: f64,
    // discordance_threshold: f64,
    // concordance_matrix_dominance: Vec<Vec<f64>>,
    // discordance_matrix_dominance: Vec<Vec<f64>>,
    // dominance_matrix: Vec<Vec<f64>>,
    // penilaian_dominance: Vec<f64>,
    // perangkingan_dominance: Vec<usize>,
    concordance_min_discordance: Vec<Vec<f64>>,
    nilai_akhir: Vec<f64>,
    ranking: Vec<usize>
}

#[derive(Debug, Serialize, Deserialize)]
enum CriteriaKind {
    #[serde(rename = "benefit")]
    Benefit,
    #[serde(rename = "cost")]
    Cost
}

#[test]
fn test_shape() {
    let args = r#"{"data":[[1,1,1,3,4,4,4,2],[4,1,3,1,4,4,3,2],[3,4,3,4,4,4,4,2],[4,2,2,3,4,4,4,2],[2,5,3,4,4,4,1,2],[2,4,2,4,4,4,3,2],[4,3,2,2,4,4,4,2],[4,5,1,1,4,4,4,2],[4,2,2,3,4,4,1,2],[3,2,1,4,4,4,2,2],[2,4,1,1,4,4,4,2],[1,2,2,2,4,4,2,2],[3,5,1,2,4,4,2,2],[3,3,2,4,4,4,4,2],[4,4,3,3,4,4,2,2],[4,1,1,4,4,4,2,2],[4,1,1,2,4,4,4,2],[3,4,1,1,4,4,1,2],[1,3,2,2,4,4,4,2],[4,4,3,4,4,4,2,2],[4,5,1,3,4,4,4,2],[2,2,2,2,4,4,4,2],[2,4,3,3,4,4,1,2],[2,5,3,2,4,4,2,2],[4,5,2,1,4,4,4,2],[4,5,1,2,4,4,4,2],[1,5,3,2,4,4,1,2],[2,4,3,2,4,4,4,2],[3,5,3,1,4,4,2,2],[4,4,3,4,4,4,3,2]],"weight":[0.100392,0.0357281,0.0428859,0.19604,0.202612,0.20341,0.130164,0.0887691],"criteria_kind":["benefit","cost","benefit","cost","benefit","cost","benefit","benefit"]}"#;

    let raw_data = serde_json::from_str::<TheThing>(args).unwrap();
    println!("{:?}", raw_data);
}
