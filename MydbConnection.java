
import java.sql.Connection;
import java.sql.DriverManager;


/**
 *
 * @author Colm Varain
 */
public class MydbConnection {
    
// function to connect to mysql database
    
    public static Connection getConnection(){
     
        Connection con = null;
        try {
            Class.forName("com.mysql.jdbc.Driver");
            con = DriverManager.getConnection("jdbc:mysql://localhost/sportsandsocialdb", "root", "");
        } catch (Exception ex) {
            System.out.println(ex.getMessage());
        }
        
        return con;
    }
    
}    
    
