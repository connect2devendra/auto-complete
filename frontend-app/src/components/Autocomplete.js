import React, {useState, useEffect} from 'react'

const Autocomplete = () => {

    const [keyword, setKeyword] = useState("");
    const [countries, setCountries] = useState(null);
    const apiEndPoint = "http://127.0.0.1:8000/api/country/autocomplete.php";

    const handleKeywordChange = (e) => {
        let name = e.target.name;
        let value = e.target.value;
        console.log(name,value);
        setKeyword(value);
    }    

    useEffect((e) => {

        //check if keyword is empty then set state variable of countries is null (i.e no suggestion)
        //otherwise call api to get result based on keyword
        if(keyword === ''){

             setCountries(null);

             }else{

            getSuggestionApi(); 
        }

        async function getSuggestionApi(){         
             
                const response = await fetch(`${apiEndPoint}?keyword=${keyword}`);       

                const result = await response.json();
                // console.log(result);
                if (result.success) {

                    //set data comming from api to state variable    
                    setCountries(result.data);                     
                    // console.log(countries);
                }           
                
        }        
       
    }, [keyword]); //keyword as a dependency


    return (
        <div className="container">
        <h1 className="text-center">Auto suggestion based on Keyword</h1>
        <div className="mt-5">
          <input type="text" name="keyword" value={keyword} onChange={handleKeywordChange} className="form-control" />

          {countries && (
            <div>
                {/* loop over the countries */}
                
                {countries.map((country, idx) => (
                <div key={idx}>
                    <span><strong>{country.name}</strong></span>
                </div>
                ))}
            </div>
            )}
         
        </div>
      </div>
    )
}

export default Autocomplete
