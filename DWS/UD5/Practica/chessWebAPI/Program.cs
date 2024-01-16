﻿namespace ChessAPI
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Begin Chess Console Test...");

            string board = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR";

            ChessGame chess = new ChessGame(board);

            chess.DrawBoard();

            Console.WriteLine("End. Chess Console Test...");
        }
    }
}