
namespace ChessAPI.Model
{
    public class GameStateManager
    {
        private static GameStateManager _instance;
        private Movement _previousMove;

        private GameStateManager() { }

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

        public Movement PreviousMove => _previousMove;

        public void UpdatePreviousMove(Movement move)
        {
            _previousMove = move;
        }
    }
}