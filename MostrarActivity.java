 package com.example.myappbdsw;

import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.os.Build;
import android.os.Bundle;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.Volley;
import com.example.myappbdsw.modeloVO.Medicamento;

import org.json.JSONArray;
import org.json.JSONObject;

import java.util.ArrayList;

 public class MostrarActivity extends AppCompatActivity implements Response.Listener<JSONObject>, Response.ErrorListener {

     private ListView lista;
        private ArrayList<String> listaDatos;
        private ArrayList<Medicamento> listaMedicamento;


     RequestQueue requestQueue ;
     JsonObjectRequest jsonObjectRequest;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mostrar);

        lista = findViewById(R.id.listamostrar);
        requestQueue = Volley.newRequestQueue(this);

        this.consultaCompletaSW();
    }



    @SuppressLint("NewApi")
    public void consultaCompletaSW(){
            String url;
            url = InsertarActivity.IP_SERVER+"/php_sw/mostrar_sw.php";
           jsonObjectRequest = new JsonObjectRequest(Request.Method.GET, url, null, this, this);
           requestQueue.add(jsonObjectRequest);
    }

     @Override
     public void onResponse(JSONObject response) {

        //obtencion de todas las registros obtenidos por la consulta en PHP
            Medicamento medicamento = null;
            JSONArray jsonArray = response.optJSONArray("tbl_medicamento");
            listaMedicamento =  new ArrayList<>();
            try {
                for (int i =0 ; i < jsonArray.length(); i++){
                    medicamento = new Medicamento();
                    //se define para poder cargar la informacion ya en el arregl0 de respuesta
                    JSONObject jsonObject = null;
                    //se le asigna cada informacion por recorrrido  del array de respuesta
                    jsonObject = jsonArray.getJSONObject(i);

                    //se agrega cada paramentro con los campos
                    medicamento.setId(jsonObject.optInt("id"));
                    medicamento.setId(jsonObject.optInt("nombre_medicamento"));
                    medicamento.setId(jsonObject.optInt("cantidad"));
                    medicamento.setId(jsonObject.optInt("precio"));

                    //llenamos nuestras lista
                     listaMedicamento.add(medicamento);
                }

                listaDatos = new ArrayList<>();
                for (int i= 0; i<listaMedicamento.size();i++){
                    listaDatos.add(listaMedicamento.get(i).getNombre_medicamento());
                }
                ArrayAdapter adapter = new ArrayAdapter(this, android.R.layout.simple_list_item_1,listaDatos);
                lista.setAdapter(adapter);
            }
            catch (Exception e){

                Toast.makeText(this, "Error desconocido"+e, Toast.LENGTH_SHORT).show();
            }


     }
     @Override
     public void onErrorResponse(VolleyError error) {
         Toast.makeText(this, "Error"+error, Toast.LENGTH_SHORT).show();
     }


 }
