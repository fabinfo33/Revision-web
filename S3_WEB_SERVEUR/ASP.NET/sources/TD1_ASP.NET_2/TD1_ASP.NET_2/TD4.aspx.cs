using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class TD4 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        /* récupération des donnees */


        /* Connexion a la base */
        string connectionString =
        "Server=info-dormeur;Database=Classique_Web_2017;" +
        "User Id=ETD;Password=ETD";
        var connection = new SqlConnection(connectionString);
        connection.Open();

        /* Preparation de la requete */
        //string sql = "INSERT INTO Abonne (Nom_Abonne, Prenom_Abonne, Login, Password) VALUES(@nom, @prenom, @login, @pass)";
        //SqlCommand command = new SqlCommand(sql, connection);
        //command.Parameters.AddWithValue("@nom", "Bach");
        connection.Close();

    }

    protected void SubmitAbonne_Click(object sender, EventArgs e)
    {
        LabelLogin.Text = "GGGG";
        LabelPrenom.Text = "AAAAA";
    }
}