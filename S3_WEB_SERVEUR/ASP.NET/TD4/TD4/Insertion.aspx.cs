using System;
using System.Collections.Generic;
using System.Collections.Specialized;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class TD4 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }

    protected void insert_btn_Click(object sender, EventArgs e)
    {
        /* Récupération et traitement des donnees */
        NameValueCollection nvc = Request.Form;
        string nom, prenom, login, password;


        if (!string.IsNullOrEmpty(nvc["nom"]) &&
            !string.IsNullOrEmpty(nvc["prenom"]) &&
            !string.IsNullOrEmpty(nvc["login"]) &&
            !string.IsNullOrEmpty(nvc["password"]))
        {
            nom = nvc["nom"];
            prenom = nvc["prenom"];
            login = nvc["login"];
            password = nvc["password"];

            string connectionString = "Server=info-dormeur;Database=Classique_Web_2017;" +
                                   "User Id=ETD;Password=ETD";

            var connection = new SqlConnection(connectionString);
            connection.Open();

            string sql = "INSERT INTO Abonne (Nom_abonne, Prenom_abonne, login, password) VALUES(@nom, @prenom, @login, @password)";
            SqlCommand command = new SqlCommand(sql, connection);
            command.Parameters.AddWithValue("@nom", nom);
            command.Parameters.AddWithValue("@prenom", prenom);
            command.Parameters.AddWithValue("@login", login);
            command.Parameters.AddWithValue("@password", password);
            command.ExecuteNonQuery();

            connection.Close();
        } else
        {
            Response.Write("Erreur dans le formulaire");
        }

        
    }
}