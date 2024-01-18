using Model;

internal class MaterialValue : IMaterialValue
{
    public Material CalculateMaterial()
    {
        return Model.ChessGame.CalculateMaterial();
    }
}