<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Default.aspx.cs" Inherits="_Default" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <a href="Hello.aspx?nom=bob&prenom=fab">Hello ?</a>
    <form id="form1" runat="server">
        <asp:Label ID="Label1" runat="server" Text="nombre 1"></asp:Label>
        <asp:Label ID="Label2" runat="server" Text="nombre 2"></asp:Label>
        <div style="height: 60px; width: 653px">
            <asp:TextBox runat="server" id="n1" />
            <asp:Label ID="Label3" runat="server" Text="+"></asp:Label>
            <asp:TextBox runat="server" id="n2" Height="16px" />
            <asp:Button runat="server" OnClick="Button_Click" Text="Valider" />
        </div>
        <asp:Label ID="Label4" runat="server" Text="Resultat"></asp:Label>
        <asp:TextBox ID="boxRes" runat="server" EnableTheming="True"></asp:TextBox>
    </form>
</body>
</html>
