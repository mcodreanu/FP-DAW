﻿namespace ChessAPI
{
    class Program
    {
        static void Main(string[] args)
        {
            State state = new State();

            string board = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR";

            state.getMaterial(board);
        }
    }
}