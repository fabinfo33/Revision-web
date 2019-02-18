using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class jouer : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        int x = Int32.Parse(Request.QueryString["x"]);
        int y = Int32.Parse(Request.QueryString["y"]);

        if (Session["grid"] != null)
        {
            var grid = (string[,])Session["grid"];
            if ((bool)Session["joueurX"] == true)
            {
                grid[x, y] = "X";
            }
            else
            {
                grid[x, y] = "O";
            }
            Response.Redirect("TD3.aspx");
        }
        else
        {
            Response.Write("Erreur de session");
        }



    }
}