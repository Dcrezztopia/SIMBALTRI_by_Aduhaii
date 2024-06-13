use std::env::args;

mod ahp;
mod value_mapper;
mod common;
mod util;
mod error;

fn main() {
    let args = args().collect::<Vec<String>>();
    if args.len() < 2 {
        eprintln!("Usage: spk <subcommand> <input>");
        return;
    }
    match args.get(1) {
        Some(subcommand) => match subcommand.as_str() {
            "ahp-pw" => match args.get(2) {
                Some(input) => ahp::handle_input_for_pw(input),
                None => eprintln!("Usage: spk ahp <input>"),
            },
            "value-mapper" => match args.get(2) {
                Some(input) => value_mapper(input),
                None => eprintln!("Usage: spk value-mapper <input>"),
            },
            "electre" => match args.get(2) {
                Some(input) => electre(input),
                None => eprintln!("Usage: spk electre <input>"),
            },
            "chain" => match args.get(2) {
                Some(_) => (),
                None => eprintln!("Usage: spk chain <input>"),
            }
            _ => eprintln!("Unknown subcommand: {}", subcommand),
        },
        None => eprintln!("No subcommand provided"),
    }
}

fn value_mapper(_input: &str) {}

fn electre(_input: &str) {}
