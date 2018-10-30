import java.net.URL; 
import org.apache.axis.client.Service; 
import org.apache.axis.client.Call; 
import org.apache.axis.encoding.XMLType; 
import javax.xml.rpc.ParameterMode;

public class ConvertClient {
	public static void main (String args[]) { 
		try { // EndPoint URL for the convert Web service 
			String endpointURL = "http://localhost:8080/axis/Convert.jws"; String methodName = "toFahrenheit";
			Service service = new Service(); // Create Web service object of Call available in client 
			// package of API 
			Call call = (Call) service.createCall(); 
			//Set the endPoint URL 
			call.setTargetEndpointAddress(new java.net.URL(endpointURL));
			//Set the methodname to invoke --- toFahrenheit 
			call.setOperationName(methodName); 
			//Set three parameters: a user-defined name of the 
			//parameter, the parameter data type, and kind of
			//parameter – input only, output only, input/output 
			call.addParameter("celsius", XMLType.XSD_STRING, ParameterMode.IN); 
			//set return type of the method call.setReturnType(XMLType.XSD_STRING);
			//Setup the command line argument to be passed as input 
			//parameter to the convert Web service
			String result = (String) call.invoke( new Object[] { args[0] } ); //Print out the result System.out.println(result);
			} catch (Exception e) { System.err.println(e.toString()); }
		}
	}
