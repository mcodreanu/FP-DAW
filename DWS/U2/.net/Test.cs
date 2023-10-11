using System;

namespace Test
{
    class Test
    {
        static void Main(string[] args)
        {
            /* Bucles
            //for
            for (int j = 0; j <= 7; j++)
            {
                Console.WriteLine(j);
            }

            //while
            int n = 10;
            while (n>0)
            {
                n--;
                Console.WriteLine(n);
            }
            */

            /* Arrays */
            //Array
            int[] numbers = new int[2]{5,25};
            foreach (var item in numbers)
            {
                Console.WriteLine(item);
            }

            //Array bidimensional
            char[,] board = new char[3,3] {{'-','-','-'},
            {'-','-','-'},
            {'-','-','-'}};
            for (int columna = 0; columna < board.GetLength(0); columna++)
            {
                for (int fila = 0; fila < board.GetLength(1); fila++)
                {
                    Console.Write(board[columna, fila] + "\t");
                }
                Console.WriteLine();
            }
        }
    }
}