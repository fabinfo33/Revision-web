using System;
using System.Collections.Generic;
using System.Globalization;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class _Default : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }

    protected void Button_Click(object sender, EventArgs e)

    {
        float.TryParse(n1.Text, out float n1Parsed, CultureInfo.InvariantCulture);

        float n1Parsed = float.Parse(n1.Text);
        float n2Parsed = float.Parse(n2.Text, CultureInfo.InvariantCulture);
        float res = n1Parsed + n2Parsed;
        boxRes.Text = res.ToString();
    }
    
}