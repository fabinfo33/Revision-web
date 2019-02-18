using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class TD3 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        //var grid = new string[3, 3] {
        //    {"", "O", "O"},
        //    {"", "X", ""},
        //    {"", "",  ""}
        //};
        string[,] grid;

        /*
         * Gestion Grid */

        if (Session["grid"] == null)
        {
            grid = new string[3, 3] {
            {"", "", ""},
            {"", "", ""},
            {"", "", ""}
            };
            Session["grid"] = grid;
            Session["joueurX"] = true;
        }
        else
        {
            grid = (string[,])Session["grid"];
        }

        /* Gestion Joueur */

        if (Session["joueurX"] == null)
        {
            Session["joueurX"] = true;
        }
        else if ((bool)Session["joueurX"])
        {
            Session["joueurX"] = false;
        }
        else
        {
            Session["joueurX"] = true;
        }

        /* Gestion tableau */

        Table tab = Table1;
        HyperLink lienJouer = new HyperLink();
        //lienJouer.NavigateUrl = "jouer.aspx?x=" + x + "&y=" + y;
        lienJouer.Text = "jouer";

        for (int i = 0; i < 3; i++)
        {
            for (int j = 0; j < 3; j++)
            {
                lienJouer.NavigateUrl = "jouer.aspx?x=" + i + "&y=" + j;

                if (grid[i, j].Equals(""))
                {
                    tab.Rows[i].Cells[j].Text = "<a href=\"" + lienJouer.NavigateUrl + "\">" + lienJouer.Text + "</a>";
                }
                else
                {
                    tab.Rows[i].Cells[j].Text = grid[i, j];
                }
            }
        }

    }

    protected void BtnReset_Click(object sender, EventArgs e)
    {
        string[,] grid;

        grid = new string[3, 3] {
            {"", "", ""},
            {"", "", ""},
            {"", "", ""}
            };
        Session["grid"] = grid;
        Session["joueurX"] = true;
        Response.Redirect("TD3.aspx");
    }
}