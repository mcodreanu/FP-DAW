﻿namespace ChessAPI
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Begin Chess Console Test...");

            ChessGame chess = new ChessGame();

            chess.SetBoardString("rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR");
            chess.DrawBoard();

            var x = chess.CalculateMaterial();
            Console.WriteLine("Black: " + x.GetMaterialValueBlack);
            Console.WriteLine("White: " + x.GetMaterialValueWhite);
            Console.WriteLine(x.GetDistanceMsg);

            Console.WriteLine("End. Chess Console Test...");
        }
    }
}