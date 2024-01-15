﻿namespace ChessAPI
{
    class Program
    {
        static void Main(string[] args)
        {
            State state = new State(0,0,"");

            string[,] board = {
            {"r","n","b","q","k","b","n","r"},
            {"p","p","p","0","p","p","p","p"},
            {"0","0","0","0","0","0","0","0"},
            {"0","0","0","0","0","0","0","0"},
            {"0","0","0","0","0","0","0","0"},
            {"0","0","0","0","0","0","0","0"},
            {"P","0","P","P","P","P","0","P"},
            {"R","N","B","0","K","0","N","R"},
            };

            state.getMaterial(board);

            Console.WriteLine("White:" + state.MaterialValueWhite);
            Console.WriteLine("Black:" + state.MaterialValueBlack);
            Console.WriteLine(state.DistanceMsg);
        }
    }
}