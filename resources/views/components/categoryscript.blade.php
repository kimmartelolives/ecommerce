<script language="javascript">
    function SelectRedirect(){
    
    switch(document.getElementById('s1').value)
        {
        case "All":
        window.location="/view/all";
        break;
        
        case "Laptop":
        window.location="/view/laptop";
        break;
        
        case "CPU":
        window.location="/view/processor";
        break;
        case "GPU":
        window.location="/view/gpu";
        break;
        
        case "PSU":
        window.location="/view/psu";
        break;
        
        default:
        window.location="/"; 
        break;
        }
    }
    </script>