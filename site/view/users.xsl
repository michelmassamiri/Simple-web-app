<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
  <body>
  <h1>List of users</h2>
  <table border="1">
    <tr bgcolor="#9acd32">
      <th>Nom</th>
      <th>Prenom</th>
    </tr>
    <xsl:for-each select="users/user">
    <tr>
      <td><xsl:value-of select="nom"/></td>
      <td><xsl:value-of select="prenom"/></td>
    </tr>
  </xsl:for-each>
  </table>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>