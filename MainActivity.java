package com.example.myappbdsw;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }

    public void onclick(View view) {
        switch (view.getId()){
            case R.id.btninsertar:
                Intent intent = new Intent(getApplicationContext(), InsertarActivity.class);
                startActivity(intent);
                break;


        }
    }
}
