<%@ Page Language="C#" AutoEventWireup="true" CodeFile="td2.aspx.cs" Inherits="td2" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" ConnectionString="<%$ ConnectionStrings:Classique_Web_2017ConnectionString %>" OnSelecting="SqlDataSource1_Selecting" SelectCommand="SELECT [Nom_Musicien], [Prenom_Musicien], [Code_Musicien], [Annee_Naissance], [Annee_Mort] FROM [Musicien]"></asp:SqlDataSource>
            <asp:GridView ID="GridView1" runat="server" AllowPaging="True" AllowSorting="True" AutoGenerateColumns="False" CellPadding="4" DataKeyNames="Code_Musicien" DataSourceID="SqlDataSource1" ForeColor="#333333" GridLines="None" OnSelectedIndexChanged="GridView1_SelectedIndexChanged">
                <AlternatingRowStyle BackColor="White" ForeColor="#284775" />
                <Columns>
                    <asp:BoundField DataField="Code_Musicien" HeaderText="Code_Musicien" InsertVisible="False" ReadOnly="True" SortExpression="Code_Musicien" />
                    <asp:BoundField DataField="Nom_Musicien" HeaderText="Nom_Musicien" SortExpression="Nom_Musicien" />
                    <asp:BoundField DataField="Prenom_Musicien" HeaderText="Prenom_Musicien" SortExpression="Prenom_Musicien" />
                    <asp:BoundField DataField="Annee_Naissance" HeaderText="Annee_Naissance" SortExpression="Annee_Naissance" />
                    <asp:BoundField DataField="Annee_Mort" HeaderText="Annee_Mort" SortExpression="Annee_Mort" />
                    <asp:CommandField SelectText="Oeuvres" ShowSelectButton="True" />
                </Columns>
                <EditRowStyle BackColor="#999999" />
                <FooterStyle BackColor="#5D7B9D" Font-Bold="True" ForeColor="White" />
                <HeaderStyle BackColor="#5D7B9D" Font-Bold="True" ForeColor="White" />
                <PagerStyle BackColor="#284775" ForeColor="White" HorizontalAlign="Center" />
                <RowStyle BackColor="#F7F6F3" ForeColor="#333333" />
                <SelectedRowStyle BackColor="#E2DED6" Font-Bold="True" ForeColor="#333333" />
                <SortedAscendingCellStyle BackColor="#E9E7E2" />
                <SortedAscendingHeaderStyle BackColor="#506C8C" />
                <SortedDescendingCellStyle BackColor="#FFFDF8" />
                <SortedDescendingHeaderStyle BackColor="#6F8DAE" />
            </asp:GridView>
        </div>

    </form>
</body>
</html>
