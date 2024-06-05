use std::env::args;

use serde::{Deserialize, Serialize};
use ndarray::prelude::*;

fn main() {
    // the data would look like 
    // {
    //     "ids": [1, 2, 3],
    //     "perbandingan": [
    //          {
    //              "right_id": 1,
    //              "left_id": 2,
    //              "right_val": 2,
    //              "left_val": 3,
    //          },
    //          {
    //              "right_id": 1,
    //              "left_id": 3,
    //              "right_val": 1,
    //              "left_val": 3,
    //          },
    //          {
    //              "right_id": 2,
    //              "left_id": 3,
    //              "right_val": 2,
    //              "left_val": 1,
    //          },
    //     ]
    // }
    let args = args().collect::<Vec<String>>();
    let raw_data = serde_json::from_str::<TheThing>(&args[1]).unwrap();

    let mut data = Array2::<f32>::from_shape_fn((raw_data.ids.len(), raw_data.ids.len()), |(i, j)| {
        if i == j {
            1.0
        } else {
            let mut val = 0.0;
            for perbandingan in &raw_data.perbandingan {
                if perbandingan.right_id == raw_data.ids[i] && perbandingan.left_id == raw_data.ids[j] {
                    val = perbandingan.right_val / perbandingan.left_val;
                    break;
                } else if perbandingan.right_id == raw_data.ids[j] && perbandingan.left_id == raw_data.ids[i] {
                    val = perbandingan.left_val / perbandingan.right_val;
                    break;
                }
            }
            val
        }
    });

    let matrix_perbandingan = serde_json::from_str::<Vec<Vec<f32>>>(&data.to_string()).unwrap();

    let sum_col = Array1::<f32>::from_shape_fn(data.shape()[1], |j| {
        data.slice(s![.., j]).sum()
    });
    data /= &sum_col;
    let matrix_normalisasi = serde_json::from_str::<Vec<Vec<f32>>>(&data.to_string()).unwrap();

    let sum_row = Array1::<f32>::from_shape_fn(data.shape()[0], |i| {
        data.slice(s![i, ..]).sum()
    });
    let eigen_vector = sum_row / data.shape()[0] as f32;
    let priority_weight = serde_json::from_str::<Vec<f32>>(&eigen_vector.to_string()).unwrap();

    let response = Response {
        matrix_perbandingan,
        matrix_normalisasi,
        priority_weight,
    };

    println!("{}", serde_json::to_string(&response).unwrap());
}


#[derive(Deserialize)]
struct Perbandingan {
    right_id: usize,
    left_id: usize,
    right_val: f32,
    left_val: f32,
}

#[derive(Deserialize)]
struct TheThing {
    ids: Vec<usize>,
    perbandingan: Vec<Perbandingan>,
}

#[derive(Serialize)]
struct Response {
    matrix_perbandingan: Vec<Vec<f32>>,
    matrix_normalisasi: Vec<Vec<f32>>,
    priority_weight: Vec<f32>,
}
