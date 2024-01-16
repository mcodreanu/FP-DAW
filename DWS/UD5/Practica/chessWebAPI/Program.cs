﻿namespace ChessAPI
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Begin Chess Console Test...");

            string board = "r3r1k1/pp3nPp/1b1p1B2/1q1P1N2/P4Q2/P4Q2/1P3Pk1/R6R";

            ChessGame chess = new ChessGame(board);

            chess.DrawBoard();

            Console.WriteLine("End. Chess Console Test...");
        }
    }
}