using Microsoft.AspNetCore.Mvc;
using Model;

namespace TodoApi.Controllers;

[ApiController]
[Route("[controller]")]
internal class MaterialController : ControllerBase
{
    private IMaterialValue _materialService;

    public MaterialController(IMaterialValue materialService)
    {
        this._materialService = materialService;
    }

    [HttpGet]
    public IActionResult Get()
    {
        try
        {
            MaterialValue operationResult = new MaterialValue();
            operationResult.Result = this._materialService.CalculateMaterial();
            return Ok(operationResult);
        }   
        catch (Exception ex)
        {
            return StatusCode(StatusCodes.Status500InternalServerError);
        }     
    }
}


