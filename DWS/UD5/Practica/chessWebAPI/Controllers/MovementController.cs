using ChessAPI.Model;
using Microsoft.AspNetCore.Mvc;

namespace ChessAPI.Controllers;

[ApiController]
[Route("[controller]")]
public class MovementController : ControllerBase
{
    private IBoardService _boardService;

    public MovementController(IBoardService boardService)
    {
        this._boardService = boardService;
    }

    [HttpGet]
    public IActionResult Get(string board, int fromRow, int fromColumn, int toRow, int toColumn)
    {
        try
        {
            if (string.IsNullOrEmpty(board))
                return BadRequest("Board can't be IsNullOrEmpty");

            var response = _boardService.Validate(board, fromRow, fromColumn, toRow, toColumn);
            return Ok(response);
        }   
        catch (Exception ex)
        {
            return StatusCode(StatusCodes.Status500InternalServerError);
        }     
    }
}
