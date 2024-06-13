use std::fmt::Display;

#[derive(Debug)]
pub enum Error {
    InvalidRange,
    CantParseToInt,
}

impl Display for Error {
    fn fmt(&self, f: &mut std::fmt::Formatter<'_>) -> std::fmt::Result {
        match self {
            Error::InvalidRange => write!(f, "Invalid range"),
            Error::CantParseToInt => write!(f, "Can't parse to int"),
        }
    }
}

impl std::error::Error for Error { }
