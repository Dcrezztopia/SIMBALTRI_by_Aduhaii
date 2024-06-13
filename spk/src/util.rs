use ndarray::{Array1, Array2};

pub fn from_array1_to_vec(array: Array1<f64>) -> Vec<f64> {
    Vec::from(array.as_slice().unwrap())
}

pub fn from_array2_to_vec_vec(array: Array2<f64>) -> Vec<Vec<f64>> {
    let mut result = Vec::with_capacity(array.shape()[0]);
    for i in 0..array.shape()[0] {
        let mut inner = Vec::with_capacity(array.shape()[1]);
        for j in 0..array.shape()[1] {
            inner.push(array.as_slice().unwrap()[i * array.shape()[1] + j]);
        }
        result.push(inner);
    }
    result
}

#[test]
fn test_array1_to_vec() {
    let array = Array1::from_shape_vec(6, vec![1., 2., 3., 4., 5., 6.]).unwrap();
    let vec = from_array1_to_vec(array);
    assert_eq!(vec, vec![1., 2., 3., 4., 5., 6.]);
}

#[test]
fn test_array2_to_vec_vec() {
    let array = Array2::from_shape_vec((2, 3), vec![1., 2., 3., 4., 5., 6.]).unwrap();
    let vec_vec = from_array2_to_vec_vec(array);
    assert_eq!(vec_vec, vec![vec![1., 2., 3.], vec![4., 5., 6.]]);
}
