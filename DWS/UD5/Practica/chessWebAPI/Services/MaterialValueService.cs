using Model;

public class MaterialValue : IMaterialValue
{
    public MaterialValue CalculateMaterial()
    {
        return Model.ChessGame.CalculateMaterial();
    }
}