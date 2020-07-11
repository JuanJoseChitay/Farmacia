package com.example.myappbdsw;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;

import org.json.JSONObject;

public class EliminarActivity extends AppCompatActivity implements Response.Listener<JSONObject>, Response.ErrorListener{

    private EditText iTxtId;
    private TextView oTxtN, oTxtC, oTxtP, oTxtF;

    //Realizan la conexión directa con el SW --ph--
    RequestQueue requestQueue;
    JsonObjectRequest jsonObjectRequest;
    Eliminar objEliminar = new Eliminar();


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_eliminar);
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
