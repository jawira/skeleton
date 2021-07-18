<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="xml" indent="yes" encoding="UTF-8"/>
  <xsl:param name="buildfile.source" select="'resources/xslt/bar.xml'"/>
  <xsl:param name="updates" select="document($buildfile.source)"/>

  <xsl:variable name="newElements" select="$updates/project/property | $updates/project/target"/>

  <xsl:template match="@* | node()">
    <xsl:copy>
      <xsl:apply-templates select="@* | node()"/>
    </xsl:copy>
  </xsl:template>

  <xsl:template match="project">
    <xsl:copy>
      <xsl:apply-templates select="@* | node()"/>
      <xsl:apply-templates select="$newElements"/>
    </xsl:copy>
  </xsl:template>

</xsl:stylesheet>
