use std::ops::Range;

use serde::{Deserialize, Serialize};
use serde_json::Value;

use crate::{common::{Criteria, ScoreType}, error::Error};

pub fn handle_input(input: &str) {
    let input = serde_json::from_str(input).unwrap_or_else(|e| panic!("Error parse input.\n{e}"));
    let output = serde_json::to_string(&compute(input)).unwrap();
    println!("{output}")
}

pub fn compute(input: ValueMapperInput) -> Vec<Vec<i32>> {
    let mut output = Vec::with_capacity(input.data.len());
    for i in 0..input.data.len() {
        let mut row = Vec::with_capacity(input.criteria.len());
        for j in 0..input.criteria.len() {
            let criteria = input.criteria[j];
            let data_value = input.data[i]
                .get(&criteria.column_name)
                .unwrap_or_else(|| {
                    if let Some(name) = input.data[i].get("name") {
                        panic!("Can't get \"{}\" from data with name \"{}\"", criteria.name, name);
                    } else if let Some(nama) = input.data[i].get("nama") {
                        panic!("Can't get \"{}\" from data with nama \"{}\"", criteria.name, nama);
                    } else if let Some(id) = input.data[i].get("id") {
                        panic!("Can't get \"{}\" from data with id \"{}\"", criteria.name, id);
                    } else {
                        panic!("Can't get \"{}\" from data with offset \"{}\"", criteria.name, i);
                    }
                });
            let mapped_value = match criteria.score_type {
                ScoreType::Fixed =>
                    input.mapper
                        .iter()
                        .find(|&mapper| mapper.criteria_id == criteria.id && mapper.value.to_lowercase() == data_value.as_str().unwrap_or_else(|| panic!("Value {} in criteria {} is not a string", data_value, criteria.name)).to_lowercase()).unwrap_or_else(|| panic!("Value {} in criteria {} is not found in mapper", data_value, criteria.name)).score,
                ScoreType::Range => ,
            }
        }
    }
    vec![]
}

#[derive(Debug, Serialize, Deserialize)]
struct ValueMapperInput {
    criteria: Vec<Criteria>,
    mapper: Vec<Mapper>,
    data: Vec<Value>
}

#[derive(Debug, Serialize, Deserialize)]
struct Mapper {
    criteria_id: u32,
    value: String,
    score: i32
}

fn range(range_str: String,) -> Result<Range<i32>, Error> {
    let parts: Vec<&str> = range_str.split("..").collect();

    if parts.len() == 2 {
        let start: i32 = parts[0].parse().map_err(|_| Error::CantParseToInt)?;
        let end = parts[1];
        let end = if end == "INF" {
            std::i32::MAX
        } else {
            end.parse().map_err(|_| Error::CantParseToInt).unwrap()
        };
        Ok(start..end)
    } else {
        Err(Error::InvalidRange)
    }
}

