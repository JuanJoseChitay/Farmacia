package com.example.myappbdsw;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.EditText;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;

import org.json.JSONObject;

import java.util.Calendar;

public class ModificarActivity extends AppCompatActivity implements Response.Listener<JSONObject>, Response.ErrorListener {

    private EditText iTxtId;
    private EditText oTxtN, oTxtC, oTxtP, oTxtF;

    RequestQueue requestQueue;
    JsonObjectRequest jsonObjectRequest;

    //Calendario para obtener fecha & hora
    public final Calendar c = Calendar.getInstance();

    //Varianles para obtener la fecha
    final int mes = c.get(Calendar.MONTH);
    final int dia = c.get(Calendar.DAY_OF_MONTH);
    final int anio = c.get(Calendar.YEAR);

    Modificar objModificar = new Modificar();



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_modificar);
    }

    public void onclick(View view) {
    }

    @Override
    public void onErrorResponse(VolleyError error) {

    }

    @Override
    public void onResponse(JSONObject response) {

    }
}
