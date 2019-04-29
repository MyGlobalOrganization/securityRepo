package devoxx.security.injection;

import java.io.IOException;
import java.sql.SQLException;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet(value = "/VulnerableServlet")
public class Servlet extends HttpServlet {
  private static final long serialVersionUID = 1L;

  private static final String FIELD_NAME = "name";

  @Override
  public void doPost(HttpServletRequest taintedRequest, HttpServletResponse response)
      throws ServletException, IOException {
    response.setContentType("text/html;charset=UTF-8");

    String taintedString = "";
    if (taintedRequest.getHeader("ExpectedIssues") != null) {
      taintedString = taintedRequest.getHeader("ExpectedIssues");
    }

    String name = taintedRequest.getParameter(FIELD_NAME);
    taintedString = name;

    taintedString = java.net.URLDecoder.decode(taintedString, "UTF-8");

    try {
      new SQLInjectionVulnerability(taintedString);
      new CommandInjectionVulnerability(taintedString);
      new RegexInjectionVulnerability(taintedString);
    } catch (SQLException|IOException e) {
      e.printStackTrace();
    }
  }
}
