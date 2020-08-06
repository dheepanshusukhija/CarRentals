<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html> 
<body>
  <h2>Now Showing</h2>
  <table border="1">
    <tr bgcolor="black" style= "color:white">
      <th style="text-align:left">Movie</th>
      <th style="text-align:left">Rating</th>
      <th style="text-align:left">Language</th>
      <th style="text-align:left">Actors</th>
      <th style="text-align:left">Hall no.</th>
    </tr>
    <xsl:for-each select="SHOWING/MOVIE">
    <tr>
      <td><xsl:value-of select="TITLE"/></td>
      <td><xsl:value-of select="RATING"/></td>
      <td><xsl:value-of select="LANGUAGE"/></td>
      <td><xsl:value-of select="ACTOR"/></td>
      <td><xsl:value-of select="HALL"/></td>
    </tr>
    </xsl:for-each>
  </table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
