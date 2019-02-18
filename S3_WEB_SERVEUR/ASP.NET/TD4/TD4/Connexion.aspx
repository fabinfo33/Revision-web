<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Connexion.aspx.cs" Inherits="Connexion" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <h2>Connexion</h2>
    <form id="form1" runat="server">
        <div>
            <asp:Label ID="LabelLogin" runat="server" Text="Login"></asp:Label>
            <input id="inputLogin" type="text" name="login" /><asp:Label ID="LabelPassword" runat="server" Text="Password"></asp:Label>
            <input id="InputPassword" type="password" name="password" /><asp:Button ID="BtnConnexion" runat="server" OnClick="BtnConnexion_Click" Text="Se connecter" />
        </div>
    </form>
</body>
</html>
