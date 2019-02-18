using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Musiciens : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        string connectionString =
        "Server=info-dormeur;Database=Classique_Web_2017;" +
        "User Id=ETD;Password=ETD";

        var connection = new SqlConnection(connectionString);
        connection.Open();

        string sql = "Select Code_Musicien, Nom_Musicien, Prenom_Musicien " +
                        "from Musicien Order by Nom_Musicien";
        SqlCommand command = new SqlCommand(sql, connection);
        SqlDataReader reader = command.ExecuteReader();
        Response.Write("<style>" +
            "table { width: 100%; border-collapse: collapse; }" +
            "table, tr, td, th { border: 1px solid black; }" +
            "</style>");
        Response.Write("<h2>Liste des musiciens </h2>");
        Response.Write("<table>");
        Response.Write("<tr><th>Nom</th><th>Prenom</th><th>Action</th></tr>");
        while (reader.Read())
        {
            Response.Write("<tr>");
            Response.Write("<td>" + reader[1] + "</td>" +
                "<td>" + reader[2] + "</td>" +
                "<td>" + "<a href=\"Oeuvres.aspx?id=" +  reader[0] + " \">Oeuvres</a>" + "</td>");

            Response.Write("</tr>");
        }
        Response.Write("</table>");
        reader.Close();
    }
}