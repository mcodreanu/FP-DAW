
namespace ChessAPI.Model
{
    public class GameStateManager
    {
        private static GameStateManager _instance;
        private Movement _previousMove;
        private bool _hasMovedWhite;
        private bool _hasMovedBlack;

        private GameStateManager() 
        {
        }

        public static GameStateManager Instance
        {
            get
            {
                if (_instance == null)
                {
                    _instance = new GameStateManager();
                }
                return _instance;
            }
        }

        public void ResetState()
        {
            _previousMove = null;
            _hasMovedWhite = false;
            _hasMovedBlack = false;
        }

        public Movement PreviousMove => _previousMove;

        public void UpdatePreviousMove(Movement move)
        {
            _previousMove = move;
        }

        public bool HasMovedWhite => _hasMovedWhite;

        public void UpdateHasMovedWhite(bool hasMovedWhite)
        {
            _hasMovedWhite = hasMovedWhite;
        }

        public bool HasMovedBlack => _hasMovedBlack;

        public void UpdateHasMovedBlack(bool hasMovedBlack)
        {
            _hasMovedBlack = hasMovedBlack;
        }
    }
}