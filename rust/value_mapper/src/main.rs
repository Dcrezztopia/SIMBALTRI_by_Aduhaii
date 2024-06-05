use std::{env::args, ops::Range};

use serde::{Deserialize, Serialize};
use serde_json::Value;

fn main() {
    //
    // id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    //    nama VARCHAR(40),
    //    jenis CHAR(7),
    //    jenis_score VARCHAR(10),
    //    weight FLOAT,
    //    table_name VARCHAR(30),
    //    column_name VARCHAR(30)
    // the input would look like
    // {
    //  "kriteria": [
    //      {
    //          "id": 17,
    //          "jenis_score": "fixed",
    //          "column_name": "column1"
    //      },
    //      {
    //          "id": 18,
    //          "jenis_score": "range",
    //          "column_name": "column2"
    //      }
    //  ],
    //  "mapper": [
    //      {
    //          "kriteria_id": 17,
    //          "value": "abc",
    //          "score": 1
    //      },
    //      {
    //          "kriteria_id": 17,
    //          "value": "def",
    //          "score": 2
    //      },
    //      {
    //          "kriteria_id": 18,
    //          "value": "0..INF",
    //          "score": 1
    //      }
    //  ],
    //  "data": [
    //      {
    //          "column1": "abc",
    //          "column2": 2
    //      },
    //      {
    //          "column1": "def",
    //          "column2": 1
    //      }
    //  ]
    // }
    let args: Vec<String> = args().collect();
    let input =
        serde_json::from_str::<Input>(&args[1]).unwrap_or_else(|_| panic!("Failed to parse input"));
    let mut output = Vec::with_capacity(input.data.len());
    for i in 0..input.data.len() {
        let mut row = Vec::with_capacity(input.kriteria.len());
        for j in 0..input.kriteria.len() {
            let value = &input.data[i][&input.kriteria[j].column_name];
            row.push(match input.kriteria[j].jenis_score {
                JenisScore::Fixed => {
                    input
                        .mapper
                        .iter()
                        .find(|mapper| {
                            mapper.kriteria_id == input.kriteria[j].id
                                && mapper.value.to_lowercase()
                                    == value
                                        .as_str()
                                        .unwrap_or_else(|| {
                                            panic!(
                                                "Value {} in Kriteria {} not a string",
                                                value, input.kriteria[j].id
                                            )
                                        })
                                        .to_lowercase()
                        })
                        .unwrap_or_else(|| {
                            panic!(
                                "Value {} in Kriteria {} not found in mapper",
                                value, input.kriteria[j].id
                            )
                        })
                        .score
                }
                JenisScore::Range => {
                    input
                        .mapper
                        .iter()
                        .find(|mapper| {
                            mapper.kriteria_id == input.kriteria[j].id
                                && range(mapper.value.clone()).contains(
                                    &(value.as_i64().unwrap_or_else(|| {
                                        panic!(
                                            "Value {} in Kriteria {} not a number",
                                            value, input.kriteria[j].id
                                        )
                                    }) as i32),
                                )
                        })
                        .unwrap_or_else(|| {
                            panic!(
                                "Value {} in Kriteria {} not found in mapper",
                                value, input.kriteria[j].id
                            )
                        })
                        .score
                }
            });
        }
        output.push(row);
    }
    println!("{}", serde_json::to_string(&output).unwrap());
}

#[derive(Serialize, Deserialize)]
struct Input {
    kriteria: Vec<Kriteria>,
    mapper: Vec<Mapper>,
    data: Vec<Value>,
}

#[derive(Serialize, Deserialize)]
struct Kriteria {
    id: i32,
    jenis_score: JenisScore,
    column_name: String,
}

#[derive(Serialize, Deserialize)]
struct Mapper {
    kriteria_id: i32,
    value: String,
    score: i32,
}

#[derive(Serialize, Deserialize)]
enum JenisScore {
    #[serde(rename = "fixed")]
    Fixed,
    #[serde(rename = "range")]
    Range,
}

fn range(range_str: String) -> Range<i32> {
    let parts: Vec<&str> = range_str.split("..").collect();

    if parts.len() != 2 {
        panic!("Invalid range format");
    }

    let start: i32 = parts[0].parse().expect("Failed to parse start of range");
    let end: i32 = if parts[1] == "INF" {
        std::i32::MAX
    } else {
        parts[1].parse().expect("Failed to parse end of range")
    };

    start..end
}

#[cfg(test)]
mod tests {
    use crate::range;

    #[test]
    fn test_range() {
        assert_eq!(range("0..2".to_string()), 0..2);
        assert_eq!(range("0..INF".to_string()), 0..std::i32::MAX);
    }
}
