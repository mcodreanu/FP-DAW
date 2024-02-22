using System.Collections.Generic;

namespace ChessAPI.Model
{
    public abstract class Piece
    {
        public enum ColorEnum { WHITE, BLACK }
        public readonly ColorEnum _color;
        public abstract MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board, Movement previousMove);

        //Movimiento normal valido, movimiento no valido, enroque corto, enroque largo, al paso
        public enum MovementType { ValidNormalMovement, InvalidNormalMovement, PawnPassant };

        public virtual MovementType Validate(Movement movement, Piece[,] board, Movement previousMove)
        {
            if (!ValidateBasicRulesForMovement(movement, board))
                return MovementType.InvalidNormalMovement;

            return ValidateSpecificRulesForMovement(movement, board, previousMove);

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

        public virtual String GetCode()
        {
            string code = this.GetType().Name.Substring(0,2).ToUpper();
            string color = this._color.ToString().Substring(0,2).ToUpper();
            return $"|{code}{color}|";
        }

        public virtual MovementType ValidateCastling(Movement movement, Piece[,] board)
        {
            // Default implementation for pieces other than the king
            return MovementType.InvalidNormalMovement;
        }

        public abstract int GetScore();

        public Piece(ColorEnum color)
        {
            _color = color;
        }
    }
}


