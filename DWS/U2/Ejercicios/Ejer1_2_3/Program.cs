using System;

namespace Ejercicios
{
    class Program
    {
        public static bool Ejer01 (int[,] numeros)
        {
            int suma1 = 0;
            int suma2 = 0;
            int suma3 = 0;

            for (int fila = 0; fila < numeros.GetLength(1); fila++)
            {
                suma1 = suma1 + numeros[0,fila];
                suma2 = suma2 + numeros[1,fila];
                suma3 = suma3 + numeros[2,fila];
            }

            if (suma1 == suma2 && suma2 == suma3)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        static void Main(string[] args)
        {
            int[,] numeros = new int[3,3]
            {
                {1,2,3},
                {3,2,1},
                {3,1,2}
            };

            Console.WriteLine(Ejer01(numeros));
        }
    }
}