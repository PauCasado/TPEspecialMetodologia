package ar.edu.uade.scrumgame.presentation.view.activity;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.FragmentActivity;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.widget.ImageButton;
import android.widget.TextView;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import ar.edu.uade.scrumgame.R;
import butterknife.BindView;
import butterknife.OnClick;


public class PosicionesActivity extends AppCompatActivity {
    private TextView mTextViewDataApellido;
    private TextView mTextViewDataNombre;
    private TextView mTextViewDataPuntaje;
    private DatabaseReference mDatabase;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_posiciones);

        mTextViewDataApellido = (TextView) findViewById(R.id.textViewDataApellido);
        //mTextViewDataNombre = (TextView) findViewById(R.id.textViewDataNombre);
        //mTextViewDataPuntaje = (TextView) findViewById(R.id.textViewDataPuntaje);
        mDatabase = FirebaseDatabase.getInstance().getReference();
        mDatabase.child("tabla_posiciones").addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                if (dataSnapshot.exists()) {
                    String apellido = dataSnapshot.child("apellido").getValue().toString();
                    String nombre = dataSnapshot.child("nombre").getValue().toString();
                    int puntaje = Integer.parseInt(dataSnapshot.child("puntaje").getValue().toString());
                    mTextViewDataApellido.setText(apellido + " " + nombre + " " + puntaje);
                    //mTextViewDataNombre.setText("El nombre es: " + nombre);
                    //mTextViewDataPuntaje.setText("El puntaje es: " + puntaje);
                }
            }
            @Override
            public void onCancelled(@NonNull DatabaseError error) {
            }
        });
    }




}