using System.Collections.Generic;

namespace ChessAPI.Model
{
    public abstract class Piece
    {
        public enum ColorEnum { WHITE, BLACK }

        public readonly ColorEnum _color;

        public abstract MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board);

        //Movimiento normal valido, movimiento no valido, enroque corto, enroque largo, al paso
        public enum MovementType { ValidNormalMovement, InvalidNormalMovement, PawnPassant }

        public virtual MovementType Validate(Movement movement, Piece[,] board)
        {
            if (!ValidateBasicRulesForMovement(movement, board))
                return MovementType.InvalidNormalMovement;

            return ValidateSpecificRulesForMovement(movement, board);

        }

        /// <summary>
        /// Validación común a todas las piezas, sin tener en cuenta aún otras reglas más avanzadas como el enroque o el jaque etc
        /// </summary>
        /// <param name="movement"></param>
        /// <param name="board"></param>
        /// <returns></returns>
        public virtual bool ValidateBasicRulesForMovement(Movement movement, Piece[,] board)
        {
            if ((movement.fromRow != movement.toRow) || (movement.fromColumn != movement.toColumn))
                if ((board[movement.toRow, movement.toColumn] == null) ||
                        (board[movement.fromRow, movement.fromColumn]._color != board[movement.toRow, movement.toColumn]._color))
                {
                    return true;
                }

            return false;
        }

        public Piece(ColorEnum color)
        {
            _color = color;
        }
    }
}


