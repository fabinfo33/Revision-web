<%@ Page Language="C#" AutoEventWireup="true" CodeFile="TD4.aspx.cs" Inherits="TD4" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <h2>Insertion abonné</h2>
    <form id="insertAbonne" runat="server">
            <asp:Label ID="LabelNom" runat="server" Text="Nom"></asp:Label>
            <input id="inputNom" type="text" /><asp:Label ID="LabelPrenom" runat="server" Text="Prénom"></asp:Label>
            <input id="inputPrenom" type="text" /><asp:Label ID="LabelLogin" runat="server" Text="Login"></asp:Label>
            <input id="inputLogin" type="text" /><asp:Label ID="LabelPass" runat="server" Text="Password"></asp:Label>
            <input id="inputPassword" type="text" /><input id="SubmitAbonne" type="submit" value="Envoyer" runat="server" onclick="SubmitAbonne_Click" />
    </form>
</body>
</html>
