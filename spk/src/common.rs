use serde::{Deserialize, Serialize};



#[derive(Debug, Serialize, Deserialize)]
pub struct Criteria {
    pub id: u32,
    #[serde(alias = "nama")]
    pub name: String,
    #[serde(alias = "jenis")]
    pub score_type: ScoreType,
    pub column_name: String
}

#[derive(Debug, Serialize, Deserialize)]
pub enum ScoreType {
    #[serde(rename = "fixed")]
    Fixed,
    #[serde(rename = "range")]
    Range
}
