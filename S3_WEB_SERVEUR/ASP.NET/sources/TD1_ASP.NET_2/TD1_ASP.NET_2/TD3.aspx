<%@ Page Language="C#" AutoEventWireup="true" CodeFile="TD3.aspx.cs" Inherits="TD3" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <asp:Table ID="Table1" runat="server" BorderStyle="Dashed" CellPadding="10" GridLines="Both" Height="107px" Width="194px">
        <asp:TableRow ID="l1" runat="server">
            <asp:TableCell runat="server" HorizontalAlign="Center">1,1</asp:TableCell>
            <asp:TableCell runat="server" HorizontalAlign="Center">1,2</asp:TableCell>
            <asp:TableCell runat="server" HorizontalAlign="Center">1,3</asp:TableCell>
        </asp:TableRow>
        <asp:TableRow ID="l2" runat="server">
            <asp:TableCell runat="server" HorizontalAlign="Center">2,1</asp:TableCell>
            <asp:TableCell runat="server" HorizontalAlign="Center">2,2</asp:TableCell>
            <asp:TableCell runat="server" HorizontalAlign="Center">2,3</asp:TableCell>
        </asp:TableRow>
        <asp:TableRow ID="l3" runat="server">
            <asp:TableCell runat="server" HorizontalAlign="Center">3,1</asp:TableCell>
            <asp:TableCell runat="server" HorizontalAlign="Center">3,2</asp:TableCell>
            <asp:TableCell runat="server" HorizontalAlign="Center">3,3</asp:TableCell>
        </asp:TableRow>
        
    </asp:Table>


        <asp:Button ID="BtnReset" runat="server" OnClick="BtnReset_Click" Text="Reset" />
    </form>


</body>
</html>
