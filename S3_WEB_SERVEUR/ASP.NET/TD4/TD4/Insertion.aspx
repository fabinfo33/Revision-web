<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Insertion.aspx.cs" Inherits="TD4" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <asp:Label ID="LabelNom" runat="server" Text="Nom"></asp:Label>
            <input id="inputNom" name="nom" type="text" /><asp:Label ID="LabelPrenom" runat="server" Text="Prénom"></asp:Label>
            <input id="inputPrenom" name="prenom" type="text" /><asp:Label ID="LabelLogin" runat="server" Text="Login"></asp:Label>
            <input id="inputLogin" name="login" type="text" /><asp:Label ID="LabelPass" runat="server" Text="Password"></asp:Label>
            <input id="inputPass" name="password" type="text" /><asp:Button ID="insert_btn" runat="server" OnClick="insert_btn_Click" Text="Inserer" />
        </div>
    </form>
</body>
</html>
