using ChessAPI.Model;
using Microsoft.AspNetCore.Mvc;

namespace ChessAPI.Controllers;

[ApiController]
[Route("[controller]")]
public class PossibleMovementsController : ControllerBase
{
    private IBoardService _boardService;

    public PossibleMovementsController(IBoardService boardService)
    {
        this._boardService = boardService;
    }

    [HttpGet]
    public IActionResult Get(string board, int fromRow, int fromColumn)
    {
        try
        {
            if (string.IsNullOrEmpty(board))
                return BadRequest("Board can't be IsNullOrEmpty");

            var response = _boardService.CheckPossibleMovements(board, fromRow, fromColumn);
            return Ok(response);
        }   
        catch (Exception ex)
        {
            return StatusCode(StatusCodes.Status500InternalServerError);
        }     
    }
}
