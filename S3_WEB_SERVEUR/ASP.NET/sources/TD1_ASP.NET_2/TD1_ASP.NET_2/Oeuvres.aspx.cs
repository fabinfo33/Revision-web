using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Oeuvres : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        string connectionString =
        "Server=info-dormeur;Database=Classique_Web_2017;" +
        "User Id=ETD;Password=ETD";

        var connection = new SqlConnection(connectionString);
        connection.Open();

        string sql = "Select Musicien.Nom_Musicien, Titre_Oeuvre, Annee " +
                        "from Oeuvre " + 
                        "INNER JOIN Composer ON Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre " +
                        "INNER JOIN Musicien ON Musicien.Code_Musicien = Composer.Code_Musicien " +
                        "WHERE Musicien.Code_Musicien = @id ";
        SqlCommand command = new SqlCommand(sql, connection);
        command.Parameters.AddWithValue("@id", Request.QueryString["id"]);
        SqlDataReader reader = command.ExecuteReader();

        Response.Write("<style>" +
            "table { width: 100%; border-collapse: collapse; }" +
            "table, tr, td, th { border: 1px solid black; }" +
            "</style>");

        Response.Write("<h2>Liste des oeuvres </h2>");

        Response.Write("<table>");
        Response.Write("<tr><th>Titre Oeuvre</th><th>Annee</th></tr>");
        while (reader.Read())
        {
            Response.Write("<tr>");
            Response.Write("<td>" + reader[1] + "</td>" +
                "<td>" + reader[2] + "</td>");
            Response.Write("</tr>");
        }
        Response.Write("</table>");
        reader.Close();
    }
}