﻿namespace ChessAPI
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Begin Chess Console Test...");

            ChessGame chess = new ChessGame();

            chess.SetBoardString("8/pppppppp/8/8/8/PPPPPPPP/PPPPPPPP/RNBQKBNR");
            chess.DrawBoard();

            /*chess.DisplayMaterialScore();*/

            Console.WriteLine("End. Chess Console Test...");
        }
    }
}