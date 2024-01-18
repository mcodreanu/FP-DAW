namespace Model
{
    public class Movement
    {
        private BoardPosition _fromBoardPosition;
        private BoardPosition _toBoardPosition;

        public Movement(BoardPosition fromBoardPosition, BoardPosition toBoardPosition)
        {
            _fromBoardPosition = fromBoardPosition;
            _toBoardPosition = toBoardPosition;
        }

        public bool IsValid()
        {
            if (_fromBoardPosition.Column >= 0 && _fromBoardPosition.Column <= 7)
                return true;
            else if (_toBoardPosition.Column >= 0 && _toBoardPosition.Column <= 7)
                return true;
            else if (_fromBoardPosition.Row >= 0 && _fromBoardPosition.Row <= 7)
                return true;
            else if (_toBoardPosition.Row >= 0 && _toBoardPosition.Row <= 7)
                return true;

            return false;
        }

        public int GetFromBoardPositionColumn()
        {
            return this._fromBoardPosition.Column;
        }

        public int GetFromBoardPositionRow()
        {
            return this._fromBoardPosition.Row;
        }

        public int GetToBoardPositionColumn()
        {
            return this._toBoardPosition.Column;
        }

        public int GetToBoardPositionRow()
        {
            return this._toBoardPosition.Row;
        }
    }
}
