using System;
using System.Collections.Generic;
using System.Text;

namespace ChessAPI.Model
{
    public class Rook : Piece
    {
        public Rook(ColorEnum color) : base(color)
        {
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board)
        {

            if ((movement.fromRow!=movement.toRow) && (movement.fromColumn!=movement.toColumn))
                return MovementType.InvalidNormalMovement;

            bool valid = true;

            if (movement.fromRow == movement.toRow)  
            {
                int DC = movement.toColumn - movement.fromColumn;
                int columnFactor = DC / Math.Abs(DC);

                int iColumn = 1;
                while ((valid) && (iColumn <= Math.Abs(DC) - 1))
                {
                    if (board[movement.fromColumn + iColumn*columnFactor, movement.fromRow] != null)
                        valid = false;
                    iColumn++;
                }
            }
            else
            {
                if (movement.toColumn == movement.fromColumn) 
                {
                    int DF = movement.toRow - movement.fromRow;
                    int rowFactor = DF / Math.Abs(DF);
                    int iRow = 1;
                    while ((valid) && (iRow <= Math.Abs(DF)-1))
                    {
                        if (board[movement.fromColumn, movement.fromRow + iRow *rowFactor] != null)
                            valid = false;
                        iRow++;
                    }
                }
            }

            if (valid)
                return MovementType.ValidNormalMovement;
            else
                return MovementType.InvalidNormalMovement;

        }

        public override int GetScore()
        {
            return PieceValues.RookPieceValue;
        }
    }
}
